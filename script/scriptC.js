var quotes = [
    {
        quote: ' " To, że milczę, nie znaczy, że nie mam nic do powiedzenia." ',
        author: "Jonathan Carroll"
    },
    {
        quote: ' "Czytanie książek to najpiękniejsza zabawa, jaką sobie ludzkość wymyśliła."',
        author: "Wisława Szymborska"
    },
    {
      quote: ' "Dobrze widzi się tylko sercem. Najważniejsze jest niewidoczne dla oczu"',
      author: "Antoine de Saint-Exupéry, Mały Książę"
    },
    {
      quote: ' "W chwili, kiedy zastanawiasz się czy kogoś kochasz, przestałeś go już kochać na zawsze."',
      author: "Carlos Ruiz Zafón, Cień wiatru"
    },
    {
        quote: ' "Książki są lustrem: widzisz w nich tylko to co, już masz w sobie." ',
        author: "Carlos Ruiz Zafón, Cień wiatru"
    }
   
  ];
  
  function changeQuote(button) {
    var blockquote = button.previousElementSibling.previousElementSibling.previousElementSibling;
    var author = blockquote.nextElementSibling;
    var randomIndex = Math.floor(Math.random() * quotes.length);
    blockquote.textContent = quotes[randomIndex].quote;
    author.textContent = quotes[randomIndex].author;
  }
  var buttons = document.querySelectorAll(".button");
  buttons.forEach(function(button) {
    button.addEventListener("click", function() {
        changeQuote(this);
    });
  });