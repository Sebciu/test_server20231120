## **20.11.2023 - first build:**

Uruchomienie aplikacji wraz z utworzeniem 3 przykladowych użytkowników:

1.W głównym katalogu aplikacji uruchom komendę _composer install_

2.Utwórz plik .env w którym przypiszesz dostępy do bazy danych (możesz skopiować plik .env.example i podstawić swoje dane)
* jako DB_DATABASE podaj nazwę świeżo utworzonej bazy danych - będzie nam potrzebna do odpalenia migracji

* następnie uruchom komendę: _php artisan key:generate_

3.Jeśli jesteś pewien, że masz dostęp do bazy danych i poprawnie skonfigurowany .env, możesz przystąpić do inicjowania aplikacji
* otwieramy terminal, przechodzimy do katalogu głównego projektu
* wpisujemy komendę: _artisan app:start-test-environment_ (przedrostek 'php' lub 'sail' zależy od środowiska. Jeśli używamy dockera, odpalamy poprzez 'sail artisan (..), jeżeli bez dockera, odpalamy przez 'php artisan (..)')
* komenda powoduje powołanie świeżej migracji, a następnie utworzenie 30 uzytkowników testowych, utworzenie listy firm testowych oraz listy testowych preferencji żywieniowych 

4.W pliku głównym projektu uruchom w kolejności następujące komendy:

* _npm install_ 
* _npm run build_ - buduje Vite, kompiluje scss oraz js
* _npm run dev_ - uruchamia serwer Vite. Konieczne uruchomienie obu komend równocześnie w dwóch osobnych terminalach (artisan serve, oraz npm run dev)

* _artisan serve_ - uruchamia serwer
* W razie problemów z komendami NPM, warto uruchomić komendę:
_nvm use --lts_ - która ustawia najnowszą wspieraną wersję node w naszym projekcie.
* * instrukcja instalacji nvm (jeśli nie posiadasz) - wg. tutoriali z internetu.


