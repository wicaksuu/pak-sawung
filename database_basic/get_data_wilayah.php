<?php

$url = "https://raw.githubusercontent.com/mul14/nik_parser.ts/master/src/wilayah.json";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp = json_decode($resp, true);

foreach ($resp['provinsi'] as $key => $value) {
    $provinsi[] = ["id" => $key, "nama" => $value];
}

$file = fopen("provinsi.json", "w");
fwrite($file, json_encode($provinsi));
fclose($file);

foreach ($resp['kabkot'] as $key => $value) {
    $id_provinsi = substr($key, 0, 2);
    $kota[] = ["id" => $key, "id_provinsi" => $id_provinsi, "nama" => $value];
}
$file = fopen("kota.json", "w");
fwrite($file, json_encode($kota));
fclose($file);

foreach ($resp['kecamatan'] as $key => $value) {
    $id_kota = substr($key, 0, 4);
    $dump = explode(' -- ', $value);
    $kecamatan[] = ["id" => $key, "id_kota" => $id_kota, "nama" => $dump[0], "kode_pos" => $dump[1]];
}

$file = fopen("kecamatan.json", "w");
fwrite($file, json_encode($kecamatan));
fclose($file);


if (file_exists('kecamatan.json')) {
    $kecamtan = json_decode(file_get_contents("kecamatan.json"), true);
    foreach ($kecamtan as $item) {

        $kdprop = substr($item['id'], 0, 2);
        $kdkab = substr($item['id'], 2, 2);
        $kdkec = substr($item['id'], 4, 2);
        $data_dump[] = "kdprop=$kdprop&kdkab=$kdkab&kdkec=$kdkec";
    }


    $total_urls = count($data_dump);
    $processed_urls = 0;
    for ($i = 0; $i < count($data_dump); $i += 10) {
        $slice = array_slice($data_dump, $i, 10);
        $results_villages[] = multy($slice);
        $processed_urls += 10;
        $percentage_complete = round(($processed_urls / $total_urls) * 100);
        echo "Completed Desa: $percentage_complete%\n";
    }
    $dumy_desa = array();
    foreach ($results_villages as $result) {
        foreach ($result as $value) {
            $dumy_desa[] = $value;
        }
    }

    $desa = [];
    foreach ($dumy_desa as $v) {
        $dom = new DOMDocument();
        $dom->loadHTML($v);
        $options = $dom->getElementsByTagName('option');
        foreach ($options as $option) {
            $value = $option->getAttribute('value');
            if ($value != 0) {
                $text = $option->textContent;
                $desa[] = [
                    "id" => $value,
                    "id_kecamatan" => substr($value, 0, 6),
                    "name" => preg_replace('/\s+\(\d+\)/', '', $text)
                ];
            }
        }
    }
    $file = fopen("desa.json", "w");
    fwrite($file, json_encode($desa));
    fclose($file);
}


function multy($data_post)
{
    $url = "https://cekbansos.kemensos.go.id/desa";
    $headers = array(
        "Host: cekbansos.kemensos.go.id",
        "Cookie: XSRF-TOKEN=eyJpdiI6InhTNUprOVJaNitlV3JnOXFodXVzdnc9PSIsInZhbHVlIjoiT2dsN3FlTFNSRVJOMndJY0k4YXBYMUJQOHlZNW1pcmJlZGZjVGJiVWdhcVNUQlJqaUVPZXpnbGNuakdpL0tYOERHS1lkZXpGTjROYzZjTDVqdGdaYnhNd3NTL05xMjhoT1RiMG1jUHdwWXRaTmZyOWM2dnRLS1d4aWtURUo3UHkiLCJtYWMiOiJkNTBiY2YyMTI1YzgyM2NmMDE2MGZhNzJkZDY1N2FlYjhiNjdiNWE4MjhiZDZiOWEyMzZmZWEwYzM2OTljMWVmIiwidGFnIjoiIn0%3D; cekbansoskemensos_session=eyJpdiI6IitFaTZZS3lEcEowdXJBakd2WDYvZ2c9PSIsInZhbHVlIjoiUENETUEzQklFMWZDVmp6dVFoV0RNZll5OXdFSEF4SVZlRGUxTEQ3RFlwNTNJWWM4bWwzY1lnbTFvOXRSdzhIa1BvSU4yV1Bub0JFZERjUno3VitrMm0wMi9EcmNqWndmQVJTbHhYelVJYTgzK0UyOUpISDJmZ3YvVUNJNldFTWoiLCJtYWMiOiI5Njg1MGUyMjJkMjgxZGJjYWYzZmZjM2IxYzRiYmIwYTJmZDZmZWNjYmFlYTZhNmIzZWMwMGMzZWI1ZjhlMWE3IiwidGFnIjoiIn0%3D",
        "X-Csrf-Token: WHQHJCSYp88tz2zPd7NoZZ5oZGVUpF3fRwQ1NyjV",
        "Sec-Ch-Ua-Mobile: ?0",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.5304.107 Safari/537.36",
        "Content-Type: application/x-www-form-urlencoded",
        "Accept: */*",
        "X-Requested-With: XMLHttpRequest",
        "Origin: https://cekbansos.kemensos.go.id",
        "Sec-Fetch-Site: same-origin",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Dest: empty",
        "Referer: https://cekbansos.kemensos.go.id/",
        "Accept-Language: en-US,en;q=0.9",
        "Connection: close",
    );
    // Buat handle multy curl
    $mh = curl_multi_init();

    $curlHandlers = array();
    // Loop setiap data post
    foreach ($data_post as $post) {
        // Buat handle curl baru
        $ch = curl_init();

        // Set URL tujuan
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set metode request menjadi POST
        curl_setopt($ch, CURLOPT_POST, true);

        // Set data post
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Tambahkan handle curl ke handle multy curl
        curl_multi_add_handle($mh, $ch);
        $curlHandlers[] = $ch;
    }

    // Eksekusi multy curl
    $running = null;
    do {
        curl_multi_exec($mh, $running);
    } while ($running);

    // Ambil hasil dari setiap permintaan cURL
    foreach ($curlHandlers as $ch) {
        $response = curl_multi_getcontent($ch);
        if ($response === false || empty($response)) {
            curl_setopt($ch, CURLOPT_URL, curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
            curl_multi_add_handle($mh, $ch);
            continue;
        }
        $result[] = $response;
    }
    // Tutup semua handle curl
    curl_multi_close($mh);

    return $result;
}
