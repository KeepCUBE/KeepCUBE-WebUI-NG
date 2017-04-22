
export function getAllRooms (cb) {
  Vue.http.get('rooms').then(response => {
    console.log(response)
    cb(response.data.data)
  }, response => {
    console.log(response)
  })
}

export function createRoom (group, cb) {
  Vue.http.post('rooms', group).then(response => {
    console.log(response.data.data)
    cb(response.data.data)
  }, response => {
    console.log(response)
  })
}
