pipeline {
    agent any
    stages {
      def workspace = "${env.WORKSPACE}/unixproject"
stage('Pull Code') {
    steps {
        sh '''
        rm -rf unixproject || true
        git clone https://github.com/adanmass/projectunix.git unixproject
        '''
    }
}

stage('Deploy part 1') {
    steps {
        sh """
           cd ${workspace}
           docker ps -a
           docker compose down -v
        """
    }
}

stage('Deploy part 2') {
    steps {
        sh """
           cd ${workspace}
           docker compose up -d
        """
    }
}

    }
}
