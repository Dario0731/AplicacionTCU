<?php include(CONFIG['public_path'] . 'header.client.php'); ?>

<script src="https://d3js.org/d3.v7.min.js"></script>

<div class="container" style="height: 100%;">
    <div>
        <p class="h2">Peso</p>
        <div id="weight"></div>
    </div>
</div>

<script>
    //var data = [12, 19, 3, 5, 2, 3];

    // Obtener datos desde PHP (viewbag)
    var data = <?php viewbag('weight'); ?>;

    var width = 500;
    var height = 500;
    var margin = {
        top: 20,
        right: 30,
        bottom: 40,
        left: 40
    };

    var svg = d3.select("#weight")
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var x = d3.scaleBand()
        .domain(data.map((d, i) => i))
        .range([0, width - margin.left - margin.right])
        .padding(0.1);

    var y = d3.scaleLinear()
        .domain([0, d3.max(data)])
        .nice()
        .range([height - margin.top - margin.bottom, 0]);

    svg.append("g")
        .selectAll("rect")
        .data(data)
        .enter().append("rect")
        .attr("x", (d, i) => x(i))
        .attr("y", d => y(d))
        .attr("width", x.bandwidth())
        .attr("height", d => y(0) - y(d))
        .attr("fill", "steelblue");

    svg.append("g")
        .attr("transform", "translate(0," + (height - margin.top - margin.bottom) + ")")
        .call(d3.axisBottom(x).tickFormat((d, i) => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'][i]));

    svg.append("g")
        .call(d3.axisLeft(y));
</script>

<?php include(CONFIG['public_path'] . 'footer.php') ?>