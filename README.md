# Dominium

Dominium to motyw strony dla systemu WordPress. Poniższa dokumentacja jest dokumentacją użytkownika motywu. Konfiguracja motywu odbywa się po przez `Wygląd => Dostosuj`.
Motyw został zaprojektowany tak, abyś mógł szybko stworzyć nowoczesną stronę firmową bez znajomości kodu.

## Nawigacja

- [Najwżniejsze funkcje](#️najważniejsze-funkcje)
- [Instalacja](#instalacja)
- [Konfiguracja nawigacji](#konfiguracja-nawigacji)
- [Ustawienia główne motywu](#ustawienia-główne-motywu)
- [Ustawienia motywu strony głównej](#ustawienia-motywu-strony-głównej)
  - [Ustawienia sekcji](#ustawienia-sekcji)
  - [Sekcja Nagłówek](#sekcja-nagłówek)
  - [Sekcja Kroki](#sekcja-kroki)
  - [Sekcja Odliczanie](#sekcja-odliczanie)
  - [Sekcja Napisz do nas](#sekcja-napisz-do-nas)
  - [Sekcja Produkty, Blok](#sekcja-produkty-blok)
- [Ustawienia kategorii](#ustawienia-kategorii)
- [Ustawienia styli wpisów](#ustawienia-styli-wpisów)
- [Ustawienia belki nad stroną](#ustawienia-belki-nad-stroną)
- [Ustawienia stopki](#ustawienia-stopki)
- [Ustawienia ciasteczek (cookie)](#ustawienia-ciasteczek-cookie)
- [Ustawienia strony kontaktowej](#ustawienia-strony-kontaktowej)
- [Widżety motywu](#widżet-motywu)
- [W przygotowaniu](#w-przygotowaniu)
- [Licencja](#licencja)
- [Autor](#autor)

## Najważniejsze funkcje

- ✅ Ustawienia motywu dostępne w **Customizerze**
- ✅ Możliwość **włączania, wyłączania i sortowania sekcji** strony głównej
- ✅ Sekcje: **Nagłówek, Kroki, Odliczanie, Kontakt, Blog, Produkty**
- ✅ Automatyczne wartości domyślne, jeśli użytkownik nie wprowadzi własnych treści
- ✅ Responsywny układ – działa na desktopie, tablecie i telefonie
- ✅ Prosty, lekki kod, gotowy do dalszej rozbudowy

## Instalacja

1. Pobierz motyw z [GitHub](https://github.com/Maciej86/dominium-theme-wordpress) klikając `<> Code` -> `Download ZIP`
2. Dodanie motywu przez FTP:
Przejdź do katalogu `wp-content -> themes` i tam umieść folder **dominium**
3. Dodanie motywu przez WordPress: Kliknij kolejno `Wygląd -> Motywy -> Dodaj Motyw (przycisk u góry) -> Wyślij motyw na serwer (przycisk u góry)`. Następnie za pomocą formularza prześlij plik ZIP folderu **dominium**.
4. W panelu WordPress przejdź do: `Wygląd → Motywy` i aktywuj **Dominium**
5. Skonfiguruj motyw: `Wygląd → Dostosuj`

## Konfiguracja nawigacji

    🛠️ Wygląd => Menu

Motyw oferuje dwie nawigacje:

- Menu główne - wyświetlane jest w górnej części strony
- Menu w stopce - wyświetlane jest w stopce strony

W obu przypadkach nawigacja jest jedno poziomowa.

> **_💡 Dopóki nawigacja nie zostanie skonfigurowana w panelu administracyjnym WordPress, nie będzie się wyświetlać prawidłowo. Wynika to z budowy nawigacji._**

## Ustawienia główne motywu

    🛠️ Wygląd => Dostosuj => Ustawienia główne motywu

### Motyw kolorystyczny

Obecnie motyw posiada dwa warianty kolorystczne
- Steel
- Dracula

Wersję kolorystyczną motywu można przygotować przy pomocy [Dominium Generator style](https://maciej86.github.io/dominium-generator-style/). Jest to proste narzędzie, które tworzy plik CSS, gotowy do wrzucenia na serwer. Jego pełny opis działania znajdziesz tu [dominium-generator-style](https://github.com/Maciej86/dominium-generator-style)


## Ustawienia motywu strony głównej

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej

> 💡 Strona główna składa się z kilku sekcji, które możesz **włączać, wyłączać** i **zmieniać kolejność**.

Obecnie strona główna skłąda się z następujących sekcji:

- **Nagłówek** - jest to część ze zdjęciem w tle
- **Kroki** - jest to sekcja z trzema boksami, która każa zwiera tyuł oraz treść
- **Odliczanie** - jest to sekcja, gdzie jest animacja odliczania zdeklarowanych wartości wraz z podpisem
- **Wpisy z kategorii (Produkty)** - jest to pierwsza tego typu sekcja, w której można wyświetlić wpisy z wybranej kategorii
- **Napisz do nas** - jest to wąska sekcja ze zdjęciem oraz przyciskiem kierującym do dowolnej podstrony
- **Wpisy z kategorii (Blog)** - jest to druga sekcja tego typu, gdzie można wyświetlić wpisy z wybranej kategorii

Nawigacja czy stopka nie podlegają opcji wyłączenia czy zminy kolejności.

---

### Ustawienia sekcji

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Ustawienia sekcji

W tym miejscu można wyłączyć lub włączyć poszczególne sekcje strony głównej, jak również zmienić ich kolejność na stronie.

---

### Sekcja Nagłówek

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Nagłówek

Sekcja to wyświetla treści znajdujące na samej górze strony na zdjęciu.
W sekcji znajdują się dwa przyciski. Jeżeli nie podamy linka prowadzącego do innej strony lub do części strony głównej, po przez kotwicę wówczas przyciski nie będą wyświetlane.

**Personalizacja**

- treść nagłówka 
- treść pod nagłówkiem
- opis pod nagłówkiem
- treść oraz link dwóch przycisków

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny. Jeżeli któryś z pól zostanie pusty, nie zostanie on wyświetlony
- treść z pola `Treść pod nagłówkiem` jest zawsze wyświetlana wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze
- treść przycisków jest zawsze wyświetlana wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze
- przyciemnienie na zdjęciu jest dodawane automatycznie przez motyw.

---

### Sekcja Kroki

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Kroki

Sekcja wyświetlająca treść w trzech boksach.

**Personalizacja**

- tytuł boksa
- opis boksa

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- w przypadku pozostawienia pustych pól, na stronie zostanie wyświetlony boks bez zawartości

---

### Sekcja Odliczanie

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Odliczanie

Sekcja wyświetlająca cztery boksy z odliczaniem. Każda z wartości jest odliczana od zero do wartości wskazanej w ustawieniach motywu.

**Personalizacja**

- tytuł
- wartość liczbowa, do której ma być odliczanie

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- jeżeli chcemy uzyskać indeks górny na przykład metry kwadratowe, wóczas znak należy otoczyć znacznikiem `<sup></sup>` na przykład `<sup>2</sup>`. Na stronie zostanie wyświetlone m<sup>2</sup>
- tytuł odliczania, jest zawsze wyświetlany wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze

---

### Sekcja Napisz do nas

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Napisz do nas

Sekcja wyświetlająca nagłówek tekst oraz przycisk, prowadzący do dowolnej strony, na przykład strony kontaktowej. Dzięki konfiguracji sekcja ta może zostać wykorzystana również do promocji wydarzenia.

**Personalizacja**

- tytuł
- opis pod tytułem
- treść przycisku
- wybór strony docelowej
- zdjęcie w tle

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- przyciemnienie na zdjęciu jest dodawane automatycznie przez motyw

---

### Sekcja Produkty, Blok

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Produkty, Blog

Obie sekcje na stronie głównej wyświetlają wpisy z wybranych kategorii. W przypadku skecji Blog, można podać alternatywny nagłówek dla tej sekcji. Jeżeli przy tworzeniu koategrii został podany opis, zostanie on wyświetlony na stronie głównej.

**Personalizacja**

- wybór kategorii
- ilość wpisów do wyświetlenia. Domyśllnie 3 wpisy, Podając 0 wyświetla wszystkie wpisy
- dla kategorii blog tytuł dla strony głównej

**Wyświetlana zawartość:**

- domyślnie każada kategoria wyświetli maksymalnie 3 ostatnie artykuły
- tytuł kategorii
- opis kategorii
- w przypadku ustawień dla **Blog** domyślny tytuł kategorii na stronnie głównej to **Ostatnie wpisy na blogu**

## Ustawienia kategorii

    🛠️ Wygląd => Dostosuj => Ustawienia kategorii

Każda utworzona kategoria będzie dostępna w tym panelu.

**Personalizacja**

- układ wpisów kategorii
- darta wpisu (data utworzenia, data ostatniej modyfikacji, brak daty)
- tekst przy skrócie od wpisu (np. czytaj więcej)
- tekst linku do wszystkich wpisów
- wyświetlany tekst, kiedy kategoria jest pusta

## Ustawienia styli wpisów

    🛠️ Wygląd => Dostosuj => Ustawienia styli wpisów

Obecnie motyw posiada dwa style wpisów
- Siatka
- Karty pełne

**Personalizacja**

Personalizacja każdego układu jest indywidualna dla każego z nich. 

## Ustawienia belki nad stroną

    🛠️ Wygląd => Dostosuj => Ustawienia belki nad menu

Belka nad menu jest to element strony wyświetlany nad nawigacją i logo. W tej sekcji możemy zdefiniować podstawowy adres e-mail, numer telefonu oraz linki do portali społecznościowych, które są wyświetlane rónież w stopce strony.

**Personalizacja**

- wyłączanie lub włączanie skecji - w przypadku wyłączenai sekcji dane kontaktowe oraz linki do portali społecznościowych będą wyświetlane w stopce.
- podstawowy numer telefonu
- podstawowy adres e-mail
- linki do facebook, instagram, tik tok oraz platforam x

## Ustawienia stopki

    🛠️ Wygląd => Dostosuj => Ustawienia stopki

Linki do portali społecznościowych oraz dane do kolumny **Kontakt** uzupełniamy w `Wygląd => Dostosuj => Ustawienia belki nad menu`. Natomiast nawigację tworzymy w ustawieniach Wordpress `Wygląd => Menu` lub w `Wygląd => Dostosuj => Menu` 

**Personalizacja**

Personalizacji głównie podlega pierwsza kolumna w stopce.
- skrócona nazwa firmy (jako nagłówek kolumny)
- pełna nazwa firmy
- adres
- dalszy ciąg adresu
- NIP
- REGON
- inne dane
- inne dane
- tytuł praw autorskich
- opis praw autorskich

## Ustawienia ciasteczek (cookie)

    🛠️ Wygląd => Dostosuj => Ustawienia cookie

Motyw korzysta z własnego systmu obsługi ciasteczek. Domyślnie jest ona włączona. Jeżeli zostanie on wyłączony możesz zainstalować dowolną wtyczkę do obsługi ciastek.

Użytkownik ma do wyboru, jakiego typu ciastka chce akceptować. Jeżeli wybierze tylko te niezbędne do działania witryny, wówczas na stronie nie zostaną wyświetlone mapy google oraz filmy z YouTube, a w ich miejsce zostanie wyświetlona o konieczności zaakceptowania wszystkich ciastek.

Jeżeli w ustawieniach zostanie podana strona z polityką cookies, zostanie wyświetlony trzeci przycisk, kierujący do wybranej strony.

**Personalizacja**

- włączanie/wyłączanie obsługi ciastek przez motyw
- treść komunikatu o ciasteczkach
- strona z polityką cookies
- tekst dla przycisku "Akceptuj wszystkie"
- takst dla przycisku "Akceptuj niezbędne"
- tekst dla przyisku "Więcej informacji" (przycisk prowadzący do strony z polityką cookie)
- blokowanie domen w iframe - materiały z jakich stron mają być blokowane, kiedy będą osadzone za pomocą iframe
- treść komunikatu blokady na iframe - wyświetlana treść zamiast materiału wideo lub mapy, kiedy nie są zaakceptowane wszystkie ciasteczka
- tekst przycisku blokady iframe - przycisk pokazujący ponownie wybór akceptacji ciastek
- sposób wyświetlania inforamcji o ciasteczkach oraz jego położeniu, kiedy zostanie wybrane "Okienko modalne"

## Ustawienia strony kontaktowej

    🛠️ Wygląd => Dostosuj => Ustawienia strony kontaktowej

Obecnie istnieje tylko jeden szablon strony kontaktowej. Z lewej stony dane kontaktowe, z prawej strony formularz. Niżej mapa z Google Maps, na całą szerokośćstrony.

Motyw domyślnie wspiera formularz kontaktowy tworzony przy pomocy [Contact Form 7](https://wordpress.org/plugins/contact-form-7/). 

**Konfiguracja**

1. Utwórz stronę, która będzie stroną kontaktową. W ustawieniach tej strony wybierz `Szablon` a z rozwijanej listy wybierz `Kontakt - podstawowy`. Następnie opbólikuj stronę.
2. Utwórz stronę z danymi kontaktowymi w dowolnej formie.
3. Przejdź do `Wygląd => Dostosuj => Ustawienia strony kontaktowej`. W **Strona z danymi kontaktowymi** wybierz stronę, w której znajdują siędane kontaktowe z punktu 2. W **Shortcode formularza kontaktowego** wpisz shortcode z Contact Form 7 twojego formularza kontaktowego. W **Mapa Google (pełny kod iframe)** podaj pełny kod iframe dla mapy google.

## Widżety motywu

    🛠️ Wygląd => Widżety

Motyw posiada dwa widgety, z których można skorzystać.

1. `Ostatnie wpisy z bieżącej kategorii`, wyświetla podaną ilość wpisów z aktualnej kategorii, pomijając aktualnie czytany wpis
2. `Wpis: pojedynczy post` - wyświetla pojedyńczy wpis lub stronę. Dodatkowymi ustawieniami są pokazywanie lub ukrywanie daty oraz miniaturki.

## W przygotowaniu

- [ ] Włączanie oraz wyłącznie opisu dla kategorii na stronie głównej oraz stronie kategorii
- [ ] Zmiana ilości boksów na stronie głównej w sekcji "Odliczanie"
- [ ] Wyświetlaenie dowolnej strony lub wpisu na stronie głównej
- [ ] Przygotowanie nawigacji wielopoziomowej

## Licencja

Dominium jest udostępniany na licencji **GNU General Public License v2 lub nowszej (GPL)**.  
Możesz go dowolnie używać, modyfikować i rozpowszechniać.

## Autor

**Autor:** [Maciej](https://github.com/Maciej86)  
**Repozytorium:** [https://github.com/maciej/dominium](https://github.com/Maciej86/dominium-theme-wordpress)

> Jeśli chcesz zgłosić błąd lub propozycję nowej funkcji, użyj zakładki **Issues** na GitHubie.
