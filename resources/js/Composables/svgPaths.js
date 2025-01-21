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

    const numPathsToBlur = Math.floor(paths.length * 0.2);
    const blurredIndices = new Set();

    while (blurredIndices.size < numPathsToBlur) {
        const randomIndex = Math.floor(Math.random() * paths.length);
        blurredIndices.add(randomIndex);
    }

    paths.forEach(({d, stroke, duration}, index) => {
        const path = document.createElementNS(svgNamespace, "path");
        path.setAttribute("d", d);
        path.setAttribute("stroke", stroke);
        path.style.setProperty("--animation-duration", duration);
        if (blurredIndices.has(index)) {
            path.style.filter = "blur(5px)";
        }
        fragment.appendChild(path)
    })

    svg.appendChild(fragment)
}
