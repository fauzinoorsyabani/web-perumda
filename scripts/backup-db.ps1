# Backup Database MySQL Laragon (Windows PowerShell)
# Jalankan: powershell -ExecutionPolicy Bypass -File scripts/backup-db.ps1

$dumpExe = Get-ChildItem -Path "C:\laragon\bin\mysql" -Filter "mysqldump.exe" -Recurse -ErrorAction SilentlyContinue | Select-Object -First 1 -ExpandProperty FullName
if (-not $dumpExe) {
  Write-Error "mysqldump.exe tidak ditemukan di C:\laragon\bin\mysql"
  exit 1
}

$backupDir = Join-Path (Split-Path $PSScriptRoot -Parent) "backups"
New-Item -ItemType Directory -Force -Path $backupDir | Out-Null

$stamp = Get-Date -Format "yyyyMMdd_HHmmss"
$outFile = Join-Path $backupDir "perumda_tirtasukapura_$stamp.sql"

& $dumpExe -u root --single-transaction --routines --triggers perumda_tirtasukapura | Set-Content -Path $outFile -Encoding UTF8

if ($LASTEXITCODE -eq 0 -and (Test-Path $outFile)) {
  $kb = [Math]::Round((Get-Item $outFile).Length / 1KB, 1)
  Write-Output "Backup berhasil: $outFile ($kb KB)"
} else {
  Write-Error "Backup gagal."
  exit 1
}
