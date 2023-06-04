function Show-Date_Info {
    # Получение текущей даты
    $currentDate = Get-Date
    $day = $currentDate.Day
    $month = $currentDate.Month
    $year = $currentDate.Year

    # Форматирование даты в формат dd.mm.yyyy
    $formattedDate = "{0:D2}.{1:D2}.{2:D4}" -f $day, $month, $year

    # URL для запроса информации о числе
    $dayURL = "http://numbersapi.com/$day/math"
    $monthURL = "http://numbersapi.com/$month/math"
    $yearURL = "http://numbersapi.com/$year/math"

    # Запрос информации о числе через API
    $dayResponse = Invoke-RestMethod -Uri $dayURL
    $monthResponse = Invoke-RestMethod -Uri $monthURL
    $yearResponse = Invoke-RestMethod -Uri $yearURL

    Write-Host "Today: $formattedDate"
    Write-Host $dayResponse
    Write-Host $monthResponse
    Write-Host $yearResponse
}

Show-Date_Info