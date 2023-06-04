# Получить путь к рабочему столу текущего пользователя
$desktopPath = [Environment]::GetFolderPath('Desktop')

# Создать каталог "BadLinks" на рабочем столе, если его еще нет
$badLinksPath = Join-Path -Path $desktopPath -ChildPath "BadLinks"
if (-not (Test-Path $badLinksPath)) {
    New-Item -Path $badLinksPath -ItemType Directory | Out-Null
}

# Создать объект WScript.Shell для работы с ярлыками
$shell = New-Object -ComObject WScript.Shell

# Получить ярлыки на рабочем столе
$desktopShortcutFiles = Get-ChildItem -Path $desktopPath -Filter "*.lnk" -File

# Проверить каждый ярлык на корректность
foreach ($shortcutFile in $desktopShortcutFiles) {
    $shortcut = $shell.CreateShortcut($shortcutFile.FullName)
    $targetPath = $shortcut.TargetPath

    # Проверить, существует ли целевой файл или каталог
    if (-not (Test-Path $targetPath)) {
        # Переместить недействительный ярлык в каталог "BadLinks"
        $newPath = Join-Path -Path $badLinksPath -ChildPath $shortcutFile.Name
        Move-Item -Path $shortcutFile.FullName -Destination $newPath
        Write-Host "Invalid label moved: $shortcutFile"
    }
}

Write-Host "Label verification is complete."
