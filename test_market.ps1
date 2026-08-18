$response = Invoke-WebRequest 'http://127.0.0.1:8000/api/market' -UseBasicParsing
$json = $response.Content | ConvertFrom-Json
Write-Host "Live Market Data from API:"
$json | Select-Object -First 3 | Format-Table -Property name, symbol, price, change_24h
Write-Host "`nTotal coins: $($json.Count)"
