const fetchData = async (url, prefix = 'api') => {
    const uri = `/${prefix}/${url}`;
    try {
        const response = await fetch(uri);
        if (!response.ok) {
            return null;
        }
        return await response.json();
    } catch (error) {
        return null;
    }
}

async function getSensorData(url) {
    return await fetchData(`sensor-data/${url}`);
}

function getMinMaxRange(value, percentage = 0.7, randomize = true) {
    let valuePercent = value * percentage;
    let min, max;

    let rand = randomize ? (Math.random() * valuePercent) : 0;

    min = value - valuePercent + rand;
    max = value + valuePercent;

    return [min, max];
}

