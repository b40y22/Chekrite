FROM ubuntu/nginx:latest
RUN apt-get update && apt-get install -y --no-install-recommends \
    certbot \
    python3-certbot-nginx \
    vim \
    nmap \
    mc

CMD ["nginx"]
EXPOSE 80
EXPOSE 443