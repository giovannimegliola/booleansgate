import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    const labels = ["Bootstrap", "Vue", "Vite", "Laravel"];

    const data = {
        labels: labels,
        datasets: [
            {
                label: "Framework Love Average",
                backgroundColor: ["purple", "lightgreen", "green", "blue"],
                borderColor: [
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb( 255, 159, 64 )",
                    "rgb( 255, 159, 64)",
                ],
                data: [70, 30, 80, 90],
            },
        ],
    };

    const config = {
        type: "bar",
        data: data,
        options: {
            scales: {
                x: {
                    ticks: {
                        color: "white",
                    },
                },
                y: {
                    max: 100,
                    beginAtZero: true,
                    ticks: {
                        color: "white",
                    },
                },
            },
        },
    };

    const chartColumnElement = document.getElementById("chartColumn");

    // Verifica se l'elemento con l'ID "chartColumn" esiste prima di creare il grafico
    if (chartColumnElement) {
        new Chart(chartColumnElement, config);
    }
});
