# # develop stage
# FROM node:lts-alpine as develop-stage
# WORKDIR /frontend
# COPY package*.json ./
# RUN npm install
# COPY . .

# # build stage
# FROM develop-stage as build-stage
# RUN npm run build

# # production stage
# FROM nginx:alpine as production-stage
# COPY --from=build-stage /frontend/dist /usr/share/nginx/html
# EXPOSE 3000
# CMD ["nginx", "-g", "daemon off;"]

FROM node:lts-alpine
WORKDIR /frontend
COPY package*.json ./
COPY . .