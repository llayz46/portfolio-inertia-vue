const generatePathData = (windowHeight, offsetX) => {
    const screenDiagonal = Math.hypot(window.innerWidth, windowHeight)

    let currentY = 0
    let pathData = ''
    const segmentConfig = {
        minSegmentHeight: Math.max(screenDiagonal * 0.001, 3),
        maxSegmentHeight: Math.max(screenDiagonal * 0.025, 50),
        minGapHeight: Math.max(screenDiagonal * 0.01, 20),
        maxGapHeight: Math.max(screenDiagonal * 0.15, 200),
    }

    while (currentY <= windowHeight) {
        const segmentHeight = Math.random() * (segmentConfig.maxSegmentHeight - segmentConfig.minSegmentHeight) + segmentConfig.minSegmentHeight
        const nextY = currentY + segmentHeight
        pathData += `M ${offsetX},${currentY} L ${offsetX},${nextY} `
        currentY = nextY + Math.random() * (segmentConfig.maxGapHeight - segmentConfig.minGapHeight) + segmentConfig.minGapHeight
    }

    const duplicatedPath = pathData.replace(/,([0-9]+\.?[0-9]*)/g, (match, y) => `,${parseFloat(y) + windowHeight}`);
    pathData += duplicatedPath;

    return pathData += `M ${offsetX},${windowHeight} z`
}

/*function generatePathSegments(screenHeight, offsetX) {
    const h = Math.hypot(window.innerWidth, window.innerHeight); // Diagonale de l'écran
    const e = {
        min: Math.max(h * 0.001, 3), // Longueur minimale d'un segment
        max: Math.max(h * 0.025, 50), // Longueur maximale d'un segment
        gapMin: Math.max(h * 0.01, 20), // Espace minimal entre deux segments
        gapMax: Math.max(h * 0.15, 200), // Espace maximal entre deux segments
    };

    let pathData = "";
    let currentY = 0;

    while (currentY <= screenHeight) {
        const y1 = currentY;
        const y2 = Math.min(currentY + e.min + Math.random() * e.max, screenHeight);
        const nextY = y2 + e.gapMin + Math.random() * e.gapMax;

        pathData += `M ${offsetX},${y1} L ${offsetX},${y2} `;
        currentY = nextY;
    }

    // Prolonger les segments pour une animation fluide
    const duplicatedPath = pathData.replace(/,([0-9]+\.?[0-9]*)/g, (match, y) => `,${parseFloat(y) + screenHeight}`);
    pathData += duplicatedPath;

    // Clôturer le chemin
    pathData += `M ${offsetX}, ${screenHeight} z`;

    return pathData;
}*/

export const generatePaths = (colors, windowHeight, numPaths, minDuration = 10, maxDuration = 15) => {
    const paths = []

    for (let i = 1; i < numPaths; i++) {
        const offsetX = i === 1 ? i : 15 * (i - 1) + 1
        const pathData = generatePathData(windowHeight, offsetX)
        const color = colors[Math.floor(Math.random() * colors.length)]

        const duration = `${Math.random() * minDuration + maxDuration}s`

        paths.push({
            d: pathData,
            stroke: color,
            duration
        })
    }

    return paths
}

export const appendPathsToSvg = (svg, paths) => {
    const svgNamespace = "http://www.w3.org/2000/svg";

    const fragment = document.createDocumentFragment()

    paths.forEach(({d, stroke, duration}) => {
        const path = document.createElementNS(svgNamespace, "path");
        path.setAttribute("d", d);
        path.setAttribute("stroke", stroke);
        path.style.setProperty("--animation-duration", duration);
        fragment.appendChild(path)
    })

    svg.appendChild(fragment)
}
