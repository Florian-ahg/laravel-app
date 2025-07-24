import axios from 'axios'

// Create axios instance
const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  }
})

// Set auth token if exists
const token = localStorage.getItem('auth_token')
if (token) {
  apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`
}

// Define API methods
export const authApi = {
  login: (credentials: { email: string; password: string }) => apiClient.post('/login', credentials)
}

export const contractApi = {
  getAll: () => apiClient.get('/contrats'),
  getOne: (id: number) => apiClient.get(`/contrats/${id}`),
  create: (data: any) => apiClient.post('/contrats', data),
  update: (id: number, data: any) => apiClient.put(`/contrats/${id}`, data),
  delete: (id: number) => apiClient.delete(`/contrats/${id}`)
}
