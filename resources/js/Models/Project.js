class Project {

    static create(data) {
        return axios.post('/projects/store', data)
    }
}

export default Project