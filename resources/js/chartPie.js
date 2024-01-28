import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    const data = {
        labels: ["HTML", "CSS", "JS", "PHP"],
        datasets: [
            {
                label: "Usage",
                data: [100, 200, 300, 300],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                ],
                hoverOffset: 4,
            },
        ],
    };

    const config = {
        type: "pie",
        data: data,
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: "white",
                    },
                },
            },
        },
    };

    new Chart(document.getElementById("chartPie"), config);
});
