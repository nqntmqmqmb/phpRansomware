# PHP-Ransomware
## Introduction
Simple Ransomware coded in PHP for educational purposes only.<br>
This ransomware was coded to demonstrate the concept of a ransomware through PHP - it's not to use for real attacks - <br>
The code is just ciphering & deciphering a directory with a key and an IV. <br>
Actually searching how to detect the extension of a file when it has been deciphered...

## How to use
### Cipher
```
php ransomware.php cipher [repertory] KEY.IV
``` 
ex : 
```php ransomware.php cipher C:\Users\XXX\Desktop\ Fuck1ngH4rdc0reK3y!*.V3ry_D1ff1culT_1n1t1al1s4t10n_v3ct0r```

### Decipher
```
php ransomware.php decipher [repertory] KEY.IV
```
ex : 
```php ransomware.php decipher C:\Users\XXX\Desktop\ Fuck1ngH4rdc0reK3y!*.V3ry_D1ff1culT_1n1t1al1s4t10n_v3ct0r```

### Screenshots
<img src="https://image.prntscr.com/image/okZF2B5EQRqQ-D1AXfdT4A.png">
<img src="https://image.prntscr.com/image/kwhlHo-TSIGuRUf1dTvmPQ.png">

## Todo
- [✓] Detect file extension via first header bytes of the file - in PHP -

