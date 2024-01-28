import Chart from "chart.js/auto";

const data = {
    labels: [
        "August",
        "September",
        "October",
        "November",
        "December",
        "January",
        "February",
    ],
    datasets: [
        {
            label: "Anxiety Level",
            data: [30, 15, 50, 25, 74, 55, 90],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {
        animations: {
            tension: {
                duration: 3000,
                easing: "linear",
                from: 1,
                to: 0,
                loop: true,
            },
        },
        scales: {
            x: {
                ticks: {
                    color: "white",
                },
            },
            y: {
                min: 0,
                max: 100,
                ticks: {
                    color: "white",
                },
            },
        },
    },
};

const chartTension = document.getElementById("chartTension");
if (chartTension) {
    new Chart(chartTension, config);
}
