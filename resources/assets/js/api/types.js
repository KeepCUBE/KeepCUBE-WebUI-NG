const data = require('./types.mock')
const LATENCY = 16

export function getAllTypes (cb) {
  setTimeout(() => {
    cb(data)
  }, LATENCY)
}