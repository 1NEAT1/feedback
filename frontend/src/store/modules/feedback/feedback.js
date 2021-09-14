export default {
    actions: {
         createFeedBack(ctx, data){
            const requestOptions = {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data)
            };
            return new Promise((resolve, reject) => {
                fetch('http://feedback-backend/api/createFeedBack', requestOptions)
                    .then(async response => {
                        const data = await response.json();
                        if (!data.status) {
                            reject(data.errors);
                        }
                        resolve(data);
                    });
            });
        },
    },
    mutations: {

    },
    state: {

    },
    getters: {

    },
}