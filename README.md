## **20.11.2023 - first build:**

Uruchomienie aplikacji wraz z utworzeniem 3 przykladowych użytkowników:

1. Utwórz plik .env w którym przypiszesz dostępy do bazy danych 
* jako DB_DATABASE podaj nazwę świeżo utworzonej bazy danych - będzie nam potrzebna do odpalenia migracji
2. Jeśli jesteś pewien, że masz dostęp do bazy danych i poprawnie skonfigurowany .env, możesz przystąpić do inicjowania aplikacji
* otwieramy terminal, przechodzimy do katalogu głównego projektu
* wpisujemy komendę: _artisan app:start-test-environment_ (przedrostek 'php' lub 'sail' zależy od środowiska. Jeśli używamy dockera, odpalamy poprzez 'sail artisan (..), jeżeli bez dockera, odpalamy przez 'php artisan (..)')
* komenda powoduje powołanie świeżej migracji, a następnie utworzenie 30 uzytkowników testowych, utworzenie listy firm testowych oraz listy testowych preferencji żywieniowych 

_artisan serve_ - uruchamia serwer


_npm run build_ - buduje Vite, kompiluje scss oraz js
_npm run dev_ - uruchamia serwer Vite. Konieczne uruchomienie obu komend (artisan serve, oraz npm run dev)
* W razie problemów z komendami NPM, warto uruchomić komendę:
_nvm use --lts_ - która ustawia najnowszą wspieraną wersję node w naszym projekcie.
* * instrukcja instalacji nvm (jeśli nie posiadasz) - wg. tutoriali z internetu.


