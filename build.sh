#!/bin/bash

# ====== CONFIG ======
REGISTRY="192.168.56.11"
PROJECT="pecheimg"
IMAGE="peche_app"
HARBOR_USER="admin"
HARBOR_PASS="Harbor12345"

# ====== TAGGING ======
COMMIT=$(git rev-parse --short HEAD)
DATE=$(date +"%Y%m%d-%H%M")
BRANCH=$(git rev-parse --abbrev-ref HEAD)

TAG="${BRANCH}-${DATE}-${COMMIT}"

echo "🔵 Commit : $COMMIT"
echo "🔵 Branche : $BRANCH"
echo "🔵 Tag généré : $TAG"

# ====== BUILD ======
docker build -t ${IMAGE}:${TAG} .

# ====== TAGGING ======
docker tag ${IMAGE}:${TAG} ${REGISTRY}/${PROJECT}/${IMAGE}:${TAG}
docker tag ${IMAGE}:${TAG} ${REGISTRY}/${PROJECT}/${IMAGE}:latest

# ====== LOGIN HARBOR ======
echo "$HARBOR_PASS" | docker login $REGISTRY -u $HARBOR_USER --password-stdin

# ====== PUSH ======
docker push ${REGISTRY}/${PROJECT}/${IMAGE}:${TAG}
docker push ${REGISTRY}/${PROJECT}/${IMAGE}:latest

echo "✅ Build & Push OK : ${TAG}"
