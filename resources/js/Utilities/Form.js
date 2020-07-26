import Errors from './Errors'   

class Form {
    /**
     * Create a new Form instance
     * 
     * @param {*} data 
     */
    constructor(data) {
        this.originalData = data

        for (let field in data ) {
            this[field] = data[field]
        }

        this.errors = new Errors()
    }

    /**
     * Send a post request to the given url
     * 
     * @param {string} url 
     */
    post(url) {
        return this.submit('post', url)
    }

    /**
     * Send a put request to the given url
     * 
     * @param {string} url 
     */
    put(url) {
        return this.submit('put', url)
    }

    /**
     * Send a patch request to the given url
     * 
     * @param {string} url 
     */
    patch(url) {
        return this.submit('patch', url)
    }

    /**
     * Send a delete request to the given url
     * 
     * @param {string} url 
     */
    delete(url) {
        return this.submit('delete', url)
    }

    /**
     * Submit the form
     * 
     * @param {string} requestType 
     * @param {string} url 
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
                axios[requestType](url, this.data())
                    .then(response => {
                        this.onSuccess(response.data)
                        
                        resolve(response)
                    })
                    .catch(error => {
                        reject(error)
                        this.onFail(error.response.data.errors)
                    })
        });
    }

    /**
     * Handle a successfull form submission
     * 
     * @param {object} data 
     */
    onSuccess(data) {
        this.reset()
    }

    /**
     * Handle a failed form submission
     * 
     * @param {object} errors 
     */
    onFail(errors) {

    }

    /**
     * Fetch all relavant data for the form
     */
    data() {
        let data = {}

        for (let property in this.originalData) {
            data[property] = this[property]
        }

        return data;
    }

    /**
     * Reset the form fields
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = ''
        }

        this.errors.clear()
    }
}

export default Form