const dev = process.env.NODE_ENV !== 'production'

//  if dev then return local host else return  some website
export const server = dev ? 'http://localhost:3000':'https://yourwebsite.com'