pipeline {
    agent any

    environment {
        DOCKER_IMAGE_NAME = 'unix_hw-app'
    }

    stages {
        // Stage 1: Checkout code from the repository
        stage('Checkout Code') {
            steps {
                checkout([
                    $class: 'GitSCM',
                    branches: [[name: '*/main']],
                    extensions: [],
                    userRemoteConfigs: [[
                        credentialsId: 'github-ssh-key', // Replace with your credentials ID
                        url: 'git@github.com:DoaaAlayyad/unix_hw.git'
                    ]]
                ])
            }
        }

        // Stage 2: Build the Docker image
        stage('Build Docker Image') {
            steps {
                script {
                    echo 'Building Docker image...'
                    sh 'docker build -t ${DOCKER_IMAGE_NAME}:${BUILD_ID} .'
                }
            }
        }

        // Stage 3: Run tests
        stage('Test') {
            steps {
                script {
                    echo 'Running tests...'
                    sh 'docker run --rm ${DOCKER_IMAGE_NAME}:${BUILD_ID} ./run_tests.sh'
                }
            }
        }

        // Stage 4: Deploy the application
        stage('Deploy') {
            steps {
                script {
                    echo 'Deploying application...'
                    sh '''
                    docker stop app_container || true
                    docker rm app_container || true
                    docker run -d --name app_container -p 8080:80 ${DOCKER_IMAGE_NAME}:${BUILD_ID}
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}