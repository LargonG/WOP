let app = new Vue({
    el: "#list",
    data: {
        categories: [
            {id: 1, name: "Базовое", links: [
                {href: "bubble-sort", name: "Сортировка пузырьком"},
                {href: "merge-sort", name: "Сортируй"}
            ]},
            {id: 2, name: "Графы", links: [

            ]}
        ]
    }
});