function search() {
    const inputdata = document.getElementById('search').value;
    fetch(`./incsearch.php?search_q=${inputdata}`)
        .then((res) => {
            return res.json();
        }).then((data) => {
            let result = "";
            data.forEach(post => {
                let template =
                    `
                    <div class="column">
                <div class="ui card raised">
                    <div class="image">
                        <img src="img/${post.file}">
                    </div>
                    <div class="content ">
                        <a class="ui tiny button header">${post.name}</a>
                        <div class="description">${post.description}</div>
                    </div>
                </div>
                </div>
                </div>
            `;
                result += template;
            });
            const search_result = document.getElementById('search_result');
            search_result.innerHTML = result;
        });
};
search();