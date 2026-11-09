<?php
/**
 * Consulta um CEP brasileiro na API gratuita ViaCEP.
 * Retorna valid, invalid ou unavailable para distinguir CEP inexistente
 * de indisponibilidade temporária do serviço.
 */
function consultarCepViaCep(string $cep): string
{
    $cep = preg_replace('/\\D/', '', $cep);
    if (strlen($cep) !== 8) {
        return 'invalid';
    }

    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 5,
            'ignore_errors' => true,
            'header' => "Accept: application/json\r\nUser-Agent: RailLife/1.0\r\n",
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
        ],
    ]);

    $response = @file_get_contents($url, false, $context);
    if ($response === false) {
        return 'unavailable';
    }

    $data = json_decode($response, true);
    if (!is_array($data)) {
        return 'unavailable';
    }
    if (!empty($data['erro'])) {
        return 'invalid';
    }

    return isset($data['cep']) ? 'valid' : 'unavailable';
}
