class Errors {
    /**
     * Create a new Error instance
     */
    constructor() {
        this.errors = {};
    }

    /**
     * Retrieve an error message for a field
     * 
     * @param {string} field 
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0]
        }
    }

    /**
     * Determine if an errors exists for the given field
     * 
     * @param {string} field 
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }

    /**
     * Determine if have any error
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     * Record the new errors.
     * 
     * @param {object} errors 
     */
    record(errors) {
        this.errors = errors
    }

    /**
     * Clear one or all errors
     * 
     * @param {string | null} field 
     */
    clear(field) {
        if (field) {
            delete this.errors[field]

            return
        }
        
        this.errors = {}
    }
}

export default Errors;