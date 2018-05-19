<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

       
        /* Variables */
        let suggestions = document.querySelector('#suggestions');
        let form = document.querySelector('#search-form');
        let search = document.querySelector('#search');


        function suggestionsToList(items) {
             var output = '';

             for(i=0; i < itme.length; i++) {
                 output = `<li><a href="search.php?q=${iems[i]}">${items[i]}</a></li>`;
             }
        }

        function showSuggestions(json) {
            var list = suggestionsToList(json);
            suggestions.style.display = 'block';
        }
    
        function getSuggestions() {

            let q = search.value;

            if(q.length < 3) {
                return;
            }

            var xhr = new XMLHttpequest();
            xhr.open('GET', 'autosuggest.php?q=' + q, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHTTPRequest');
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;

                    var json = JSON.parse(result);
                    showSuggestions(json);
                }
            };
            xhr.send();
        }

        search.addEventListener('input', getSuggestions);
    });
</script>