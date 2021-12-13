<?php
/* Tessera by Terexor
 *
 * Copyright (C) 2021 Terexor
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$CA_CERT = "RootCA.pem";//Not used
$CA_KEY  = "RootCA.key";

//data to sign
$data = '71936980 GEORGE GARRO MURILLO,2,';

$privateKeyPem = openssl_pkey_get_private("file://$CA_KEY");

//create signature
if( openssl_sign($data, $binarySignature, $privateKeyPem, OPENSSL_ALGO_SHA256) ) {
	//appending signature
	$data .= base64_encode($binarySignature);

	//Google API to make QR
	$qr = 'https://chart.googleapis.com/chart?cht=qr&chs=540x540&chl=';
	$qr .= urlencode($data);

	//saving image
	file_put_contents('vacunaCert.png', file_get_contents($qr));
}
