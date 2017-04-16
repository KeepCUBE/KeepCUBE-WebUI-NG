const data = require('./groups.mock')

export function getAllGroups (cb) {
  cb(data)
}

export function createGroup (cb) {
  Vue.http.post('groups').then(response => {
    console.log(response)
  }, response => {
    console.log(response)
  })
}