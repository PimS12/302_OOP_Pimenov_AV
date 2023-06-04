# Получить имя текущего пользователя и имя компьютера
$currentUserName = $env:USERNAME
$computerName = $env:COMPUTERNAME

# Создать объект Excel.Application
$excel = New-Object -ComObject Excel.Application

# Создать новую книгу
$workbook = $excel.Workbooks.Add()

# Выбрать активный лист
$worksheet = $workbook.ActiveSheet

# Вывести строку "Привет от PowerShell" в ячейку B2
$cell = $worksheet.Range("B2")
$cell.Value2 = "Привет от PowerShell"
$cell.Font.Size = 12
$cell.Font.Italic = $true

# Получить полный путь для сохранения файла
$fileName = "${currentUserName}_${computerName}.xlsx"
$filePath = Join-Path -Path $env:USERPROFILE -ChildPath $fileName

# Сохранить файл
$workbook.SaveAs($filePath)

# Закрыть книгу и выйти из Excel
$workbook.Close()
$excel.Quit()

# Освободить ресурсы COM
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($worksheet) | Out-Null
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($workbook) | Out-Null
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($excel) | Out-Null

# Вывести путь сохраненного файла
Write-Host "File saved: $filePath"
