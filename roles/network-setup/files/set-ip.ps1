param([string]$ip, [string]$gateway, [string]$dns)
$wmi = Get-WmiObject win32_networkadapterconfiguration -filter "ipenabled = 'true'"

$wmi.EnableStatic("$ip", "255.255.255.0")
$wmi.SetGateways("$gateway", 1)
$wmi.SetDNSServerSearchOrder("$dns")
