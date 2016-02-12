var $collectionHolder;

//setup an "add a pokemon" link
var $addPokemonLink = $('<a href="#" class="add_pokemon_link">Add a pokemon</a>');
var $newLinkLi = $('<li></li>').append($addPokemonLink);

jQuery(document).ready(function() {
    //Get the ul that holds the collection of pokemons
    $collectionHolder = $('ul.pokemon');

    //add the "add a pokemon" anchor and li to the pokemons ul
    $collectionHolder.append($newLinkLi);

    //count the current form inputs we have
    //index when inserting a new item
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addPokemonLink.on('click', function(e) {
        //prevent the link from creating a '#' on the url
        e.preventDefault();

        //add a new pokemon form
        addPokemonForm($collectionHolder, $newLinkLi);
    });
});

function addPokemonForm($collectionHolder, $newLinkLi) {
    //get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    //get the new index
    var index = $collectionHolder.data('index');

    //replace '__name__' in the prototype's HTML to be
    // a number based on how many items we have
    var newForm = prototype.replace('/__name__/g', index);

    //increase the index with one
    $collectionHolder.data('index', index + 1);

    //display the form on the page in an li, before "add a pokemon" link li
    var $newFormLi  = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}