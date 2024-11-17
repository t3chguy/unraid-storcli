<?
/* Copyright Lime Technology (any and all other parts of Unraid)
 *
 * Copyright Michal Telatynski <7t3chguy@gmail.com> (as author and maintainer of this file)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */

function get_temperature()
{
    $output = shell_exec("/usr/local/bin/storcli64 /c0 show temperature J 2>/dev/null");
    $data = json_decode($output, true);

    return $data["Controllers"][0]["Response Data"]["Controller Properties"][0]["Value"];
}

$response = [];

try {
    $status = [];
    $temp = get_temperature();
    $response["success"]["response"] = [[
        "temp" => $temp
    ]];
}
catch (\Throwable $t) {
    error_log($t);
    $response = [];
    $response["error"]["response"] = $t->getMessage();
}
catch (\Exception $e) {
    error_log($e);
    $response = [];
    $response["error"]["response"] = $e->getMessage();
}

echo(json_encode($response));
?>