pipeline {
    agent any
    stages {
        stage('Pull Code') {
            steps {
                sh'''
                ls -l
                rm -rf unixproject || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('Deploy part 1') {
            steps {
                sh '''
                   cd unix_project
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('Deploy part 2') {
            steps {
                sh '''
                   cd unix_project
                   docker compose up -d
                '''
            }
        }
    }
}
