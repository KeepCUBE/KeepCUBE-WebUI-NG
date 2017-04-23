
export function getAllRooms (cb) {
  Vue.http.get('rooms').then(response => {
    cb(response.data.data)
  }, response => {
    console.log(response)
  })
}

export function createRoom (group, cb) {
  Vue.http.post('rooms', group).then(response => {
    cb(response.data.data)
  }, response => {
    console.log(response)
  })
}
