const data = require('./groups.mock')
const LATENCY = 16

export function getAllGroups (cb) {
  setTimeout(() => {
    cb(data)
  }, LATENCY)
}