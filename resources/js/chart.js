import Chart from "chart.js/auto";

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
            y: {
                max: 100,
                beginAtZero: true,
            },
        },
    },
};

new Chart(document.getElementById("chartColumn"), config);
