function sellsChart() {
    let ctx = document.getElementById("sellsChart").getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
            label: '# of Votes',
            data: [1, 3, 5, 2, 4, 6, 10, 8, 10, 6],
            borderWidth: 1
            }]
        },

        options: {
            animations: {
                tension: {
                duration: 2000,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
                }
            },
        },
    });
}