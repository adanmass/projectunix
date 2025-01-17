pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/adanmass/projectunix.git'
        PROJECT_DIR = "${env.WORKSPACE}/unixproject"
    }
    stages {
        stage('Pull Code') {
            steps {
                script {
                    sh """
                        rm -rf ${PROJECT_DIR} || true
                        git clone ${REPO_URL} ${PROJECT_DIR}
                    """
                }
            }
        }
        stage('Cleanup Containers') {
            steps {
                script {
                    sh """
                        docker ps -a
                        docker kill $(docker ps -q) || true
                        docker rm $(docker ps -a -q) || true
                        docker container prune -f || true
                        docker rm unixproject-phpmyadmin-1 || true
                    """
                }
            }
        }
        stage('Deploy Part 1') {
            steps {
                script {
                    sh """
                        docker compose down -v || true
                    """
                }
            }
        }
        stage('Deploy Part 2') {
            steps {
                script {
                    sh """
                        docker compose up -d
                    """
                }
            }
        }
    }
}

