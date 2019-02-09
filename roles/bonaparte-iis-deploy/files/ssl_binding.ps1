# make sure that there aren't any certs we are overwriting

Import-Module WebAdministration

Set-Location IIS:\SslBindings

$cert_count = Get-ChildItem IIS:\SslBindings\ | measure

if ($cert_count -gt 0) {
    exit
}

New-WebBinding -Name "Default Web Site" -IP "*" -Port 443 -Protocol https
$cert = New-SelfSignedCertificate -DnsName $env:COMPUTERNAME -CertStoreLocation cert:\LocalMachine\My\
$cert | New-Item 0.0.0.0!443
