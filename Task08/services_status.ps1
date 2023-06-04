# Получить список служб и их статус
$services = Get-Service

# Применить форматирование и цвет для каждой службы
$services | ForEach-Object {
    $serviceName = $_.Name
    $serviceStatus = $_.Status

    # Определить цвет в зависимости от статуса службы
    if ($serviceStatus -eq "Running") {
        $color = "Green"
    } else {
        $color = "Red"
    }

    # Вывести имя и статус службы с применением цвета
    Write-Host $serviceName -NoNewline -ForegroundColor $color
    Write-Host " ($serviceStatus)" -ForegroundColor $color
}
