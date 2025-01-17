pipeline {
    agent any
    stages {
        stage('git clone') {
            steps {
                sh'''
                ls -l
                rm -rf unixproject || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('compose down') {
            steps {
                sh '''
                   cd unixproject
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('compose up') {
            steps {
                sh '''
                   cd unixproject
                   docker compose up -d
                '''
            }
        }
    }
}
