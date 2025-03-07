<!DOCTYPE html>
<html lang="pl">
  <head>
    <?php require_once 'includes/head.php'; ?>
  </head>
  <body>
    <a id="top"></a>
    <?php require_once 'includes/menu.php'; ?>
    <div class="main">
      <div class="introduction">
        <h2 id="wprowadzenie">Wprowadzenie</h2>
        <p>
          Moim hobby są sztuki walki. Osobiście trenuję<a
            title="Boks to jedna z najpopularniejszych sztuk walki na świecie"
            id="tooltip"
          >
            boks </a
          >od pół roku w
          <a href="https://www.crosscoregdansk.com/fightgym" target="_blank"
            >crosscore fight gym </a
          >gdańsk na zaspie. Wybrałem akurat ten sport, ponieważ pozwala on
          uzyskać umiejętności, które mogą się przydać w życiu codziennym
          niezależnie czy chodzi o obronę siebie czy innych. Dodatkowo boks jest
          klasyfikowany jako najbardziej fizycznie wymagający sport na całym
          świecie, więc wręcz wymaga zmiany trybu życia na czym również mi
          zależało. Boks stał się nie tylko sportem, ale również odskocznią od
          codziennych problemów i narzędziem do kształtowania charakteru.
        </p>
      </div>
      <div class="second-text">
        <h2>Siła, Dyscyplina i Technika</h2>
        <p>
          Częste treningi bokserskie dostarczają mi dawki wyzwań fizycznych i
          mentalnych. Boks to nie tylko walka na ringu, to także nieustanne
          doskonalenie swojej techniki, siły i kondycji. Od nauki podstawowych
          ciosów po praktykowanie uników i defensywnych ruchów - każdy trening
          przynosi mi nowe umiejętności. Ze względu na ich intensywność, po
          bardzo krótkim czasie zauważalne są benefity fizyczne oraz psychiczne.
          Dla osoby, która nie miała wcześniej tak regularnego kontaktu ze
          sportem jest to bardzo motywujące oraz utwierdzające w przekonaniu, że
          wkładany wysiłek nie idzie na marne.
        </p>
      </div>
      <div class="third-text">
        <h2>Czy boks jest dla wszystkich?</h2>
        <p>
          Po przeczytaniu informacji informacji zawartych w
          <a href="#wprowadzenie">wprowadzeniu </a>niektóre osoby mogą
          stwierdzić, że trenowanie boksu nie jest czymś dla nich. Z tego powodu
          zebrałem wady oraz zalety tej dyscypliny sztuk walki, które mam
          nadzieję, że pomogą w podjęciu decyzji. Boks to sport wymagający
          zarówno odwagi, jak i dyscypliny, i nie jest odpowiedni dla każdego.
          Poniżej przedstawię nieco bardziej szczegółowo, dla kogo boks może być
          odpowiedni i dlaczego niekoniecznie jest to sport dla każdego.
        </p>
      </div>
    </div>
    <div class="table-wrapper">
      <table>
        <tr>
          <th>Zalety</th>
          <th>Wady</th>
        </tr>
        <tr>
          <td>Rozwój fizyczny</td>
          <td>Ryzyko obrażeń</td>
        </tr>
        <tr>
          <td>Samozaparcie i dyscyplina</td>
          <td>Wymagające treningi</td>
        </tr>
        <tr>
          <td>Umiejętność samoobrony</td>
          <td>Poświęcenie dużo czasu</td>
        </tr>
        <tr>
          <td>Zaufanie i pewność siebie</td>
          <td>Konieczność zakupu sprzętu</td>
        </tr>
        <tr>
          <td>Rozwinięcie refleksu</td>
          <td>Rywalizacyjna natura</td>
        </tr>
        <tr>
          <td>Ucieczka emocjonalna</td>
          <td>Wymaga silnej psychiki</td>
        </tr>
      </table>
    </div>
    <div class="summary">
      <h2>Podsumowując</h2>
      <p>
        Boks to sport, który może przynieść wiele korzyści, ale nie jest
        odpowiedni dla każdego. Przed podjęciem decyzji o rozpoczęciu treningów
        bokserskich warto dokładnie zastanowić się nad swoimi celami,
        umiejętnościami i tolerancją na ryzyko, które jest związane z tym
        sportem. Boks może być pasjonującą i satysfakcjonującą dyscypliną, ale
        wymaga pewnych predyspozycji i gotowości do zaakceptowania jego
        specyficznych aspektów.
      </p>
    </div>
    <button class="back-to-top hidden">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="back-to-top-icon"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M7 11l5-5m0 0l5 5m-5-5v12"
        />
      </svg>
    </button>
    <?php include_once "../views/includes/footer.php" ?>
  </body>
</html>
