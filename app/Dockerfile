FROM node:alpine as install
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .

FROM install as build
RUN npm run build

FROM nginx:1.15.7-alpine as production
COPY --from=build /app/dist /usr/share/nginx/html
EXPOSE 5173
CMD ["nginx", "-g", "daemon off;"]