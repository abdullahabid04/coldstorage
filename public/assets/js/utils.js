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

async function getSensorData(url){
    return await fetchData(`sensor-data/${url}`);
}
